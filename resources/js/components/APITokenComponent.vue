<template>
	<div>
		
		<div class="token-validation">
			<label for="token-input" class="token-label">Ingrese su Token para la API:<br></label>
			<input type="password" name="token-input" placeholder="Token para la API" v-model="api_token" @keyup.enter="confirmToken()" class="token-input">
			<button id="submit-btn-SPA" @click="confirmToken()" class="token-button">Confirmar</button>
		</div>
		
		<h1>¡¡Bienvenido al Revisor de Stock de<br>The Water Level!!</h1>
	
	</div>
</template>

<script>
	export default {
		data() {
			return {
				api_token: ""
			}
		},
		methods: {
			confirmToken() {
				this.$emit('token-confirmed', this.api_token)
			}
		}
	}
</script>

