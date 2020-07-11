<template>
	<div>
		<div>Example Component</div>

		<div>
			I'm an example component.
		</div>

		<table>
			<thead>
				<tr>
					<td>Nombre del Juego </td>
					<td>Año de Lanzamiento</td>
					<td>Rating ESRB</td>
					<td>Precio Nuevo</td>
					<td>Precio Usado</td>
				</tr>
			</thead>
			<tbody>
				<tr v-for="game in games" :key="game.name">
					<td>{{ game.name }}</td>
					<td>{{ game.release_year }}</td>
					<td>{{ game.esrb_rating }}</td>
					<td>{{ game.price_new }}</td>
					<td>{{ game.price_used }}</td>
				</tr>
			</tbody>

			<!--
				IDEA:
				On hover for a game in the table, show covers using another Component.
				Maybe also add a button to do similar stuff but with merch.
				Rename API methods so that they match corrections.
				Correct or remove update stock options from API, as they were done in a GET and that's not right.
			-->
		</table>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				games: null
			}
		},
		mounted() {
			this.getGames();
		},
		methods: {
			getGames() {
				axios
					.get(
						'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/gamesforsale', {
						headers: {
							'Authorization': 'Bearer administrador'
						}
					})
					.then(response => {
						this.games = response.data
					})
					.catch(e => console.log(e))
			}
		}
	}
</script>
