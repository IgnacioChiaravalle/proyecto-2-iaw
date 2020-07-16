<template>
	<div>

		<div>
			<h1>Display All Component</h1>
		</div>

		<div>
			<h2>I'm an example component.</h2>
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
				<tr v-for="game in games" :key="game.name" @click="updateInfo('game', game.name)">
					<td>{{ game.name }}</td>
					<td>{{ game.release_year }}</td>
					<td v-if="game.esrb_rating != null" >{{ game.esrb_rating }}</td> <td v-else >No Disponible</td>
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
				<tr v-for="merch in merchItems" :key="merch.name" @click="updateInfo('merch', merch.name)">
					<td>{{ merch.name }}</td>
					<td>{{ merch.description }}</td>
					<td>{{ merch.origin_media }}</td>
					<td>{{ merch.stock }}</td>
					<td>{{ merch.price }}</td>
				</tr>
			</tbody>
		</table>

		<button @click="showItems(notShown == 'Merchandising' ? 'merch' : 'games')">Ver {{notShown}}</button>
		
	</div>
</template>

<script>
	export default {
		
		data() {
			return {
				games: null,
				merchItems: null,
				notShown: ""
			}
		},
		mounted() {
			this.showItems('games');
		},
		methods: {
			showItems(itemType) {
				if (this.games == null || this.merchItems == null)
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
							this.merchItems = response.data
						}
					})
					.catch(e => console.log("Error finding " + itemType + ":\n" + e))
			},

			updateInfo(itemType, itemName) {
				this.$emit('update-selected', itemType, itemName)
			}
		}
	}
</script>
