<template>
	<div>
		<div>Example Component</div>

		<div>
			I'm an example component.
		</div>

		<table v-if="notShown == 'Merchandising'">
			<thead>
				<tr>
					<td>Nombre del Juego</td>
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
		</table>

		<table v-else>
			<thead>
				<tr>
					<td>Nombre del<br>Artículo</td>
					<td>Descripción</td>
					<td>Multimedia de<br>origen</td>
					<td>Unidades<br>Disponibles</td>
					<td>Precio<br>Unitario</td>
				</tr>
			</thead>
			<tbody>
				<tr v-for="item in merch" :key="item.name">
					<td>{{ item.name }}</td>
					<td>{{ item.description }}</td>
					<td>{{ item.origin_media }}</td>
					<td>{{ item.stock }}</td>
					<td>{{ item.price }}</td>
				</tr>
			</tbody>
		</table>

		<button @click="showItems(notShown == 'Merchandising' ? 'merch' : 'games')">Ver {{notShown}}</button>
		<!--
			IDEA:
			On hover for a game in the table, show covers using another Component.
			Rename API methods so that they match corrections.
			Correct or remove update stock options from API, as they were done in a GET and that's not right.
		-->


	</div>
</template>

<script>
	export default {
		data() {
			return {
				games: null,
				merch: null,
				notShown: ""
			}
		},
		mounted() {
			this.showItems('games');
		},
		methods: {
			showItems(itemType) {
				if (this.games == null || this.merch == null)
					this.getItems(itemType);

				if (itemType == 'games')
					this.notShown = "Merchandising"
				else
					this.notShown = "Juegos"
			},

			getItems(itemType) {
				axios
					.get(
						'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/' + itemType + 'forsale', {
						headers: {
							'Authorization': 'Bearer administrador'
						}
					})
					.then(response => {
						if (itemType == 'games') {
							this.notShown = "Merchandising"
							this.games = response.data
						}
						else {
							this.notShown = "Juegos"
							this.merch = response.data;
						}
					})
					.catch(e => console.log(e))
			}
		}
	}
</script>
