<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use App\User;
use Mail;

class ForgotPasswordController extends Controller {
	protected function passwordResetEmail(Request $request) {
		$request->validate([
			'email' => ['required', 'string', 'email', 'max:255']
		]);
		try {
			$user = User::where('email', $request->email)->firstOrFail();
			return $this->validationSuccess($user, $request);
		}
		catch (ModelNotFoundException $ex) {
			return back()->with('message', "No hay ningún usuario registrado con el correo electrónico " . $request->email . " en el sistema.");
		}
	}

	private function validationSuccess(User $user, Request $request) {
		//Create Password Reset Token:
		DB::table('password_resets')->insert([
			'email' => $request->email,
			'token' => $this->generateRandomString(),
			'created_at' => Carbon::now()
		]);
		//Get the token just created above:
		$tokenData = DB::table('password_resets')->where('email', $request->email)->first();

		if ($this->sendResetEmail($user, $tokenData->token))
			return redirect('/login')->with('message', "¡Hemos enviado un correo de recuperación de contraseña a la casilla provista!");
		else
			return back()->with('message', "Hubo un error de red inesperado. Por favor, intentá de nuevo.");
	}

	private function generateRandomString($length = 60) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		return $randomString;
	}

	private function sendResetEmail($user, $token) {
		//Generate the password reset link. The token generated is embedded in the link:
		$link = URL::to('/') . '/password/reset/' . $token . '/' . urlencode($user->email);
		try {
			Mail::send(
				'auth.passwords.forgot',
				['user' => $user, 'link' => $link],
				function($message) use ($user) {
					$message->to($user->email);
					$message->subject("$user->name, cambiá tu contraseña");
				}
			);
			return true;
		}
		catch (\Exception $ex) {
			return false;
		}
	}

	protected function resetPassword(Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|email|exists:users,email',
			'password' => 'required|confirmed',
			'token' => 'required'
		]);
		if ($validator->fails())
			return back()->with('message', "Por favor, asegurate de completar correctamente el formulario.");

		$password = $request->password;
		// Validate the token:
		$tokenData = DB::table('password_resets')->where('email', $request->email)->first();
		// Redirect the user back to the password reset request form if the token is not found:
		if (!$tokenData)
			return redirect('/requestpasswordreset')->with('message', "La validación de la solicitud de recuperación de contraseña falló.");

		$user = User::where('email', $tokenData->email)->first();
		// Redirect the user back if the email is invalid:
		if (!$user)
			return back()->with('message', "El correo electrónico no fue encontrado.");
		//Hash and update the new password:
		$user->password = \Hash::make($password);
		$user->update();

		//Delete the token:
		DB::table('password_resets')->where('email', $user->email)->delete();

		return redirect('/login')->with('message', "Contraseña actualizada con éxito.");

	}
		
}
