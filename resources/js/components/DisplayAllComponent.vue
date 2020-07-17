<template>
	<div>

		<button @click="showItems(notShown == 'Merchandising' ? 'merch' : 'games')" class="swap-table-button">Ver<br>{{notShown}}</button>

		<table v-if="notShown == 'Merchandising'" class="table-game">
			<thead class="thead-game">
				<tr class="tr-head-game">
					<td>Nombre del<br>Juego</td>
					<td>Año de<br>Lanzamiento</td>
					<td>Rating<br>ESRB</td>
					<td>Precio<br>Nuevo</td>
					<td>Precio<br>Usado</td>
				</tr>
			</thead>
			<tbody class="tbody-game">
				<tr v-for="game in games" :key="game.name" :id="game.name" @click="updateInfo('game', game.name)" class="tr-body tr-body-game">
					<td>{{ game.name }}</td>
					<td>{{ game.release_year }}</td>
					<td v-if="game.esrb_rating != null">{{ game.esrb_rating }}</td> <td v-else>No Disponible</td>
					<td>{{ game.price_new }}</td>
					<td>{{ game.price_used }}</td>
				</tr>
			</tbody>
		</table>

		<table v-else class="table-merch">
			<thead class="thead-merch">
				<tr class="tr-head-merch">
					<td class="td-head-merch">Nombre del<br>Artículo</td>
					<td class="td-head-merch">Descripción</td>
					<td class="td-head-merch">Multimedia de<br>origen</td>
					<td class="td-head-merch">Unidades<br>Disponibles</td>
					<td class="td-head-merch">Precio<br>Unitario</td>
				</tr>
			</thead>
			<tbody class="tbody-merch">
				<tr v-for="merch in merchItems" :key="merch.name" :id="merch.name" @click="updateInfo('merch', merch.name)" class="tr-body tr-body-merch">
					<td>{{ merch.name }}</td>
					<td>{{ merch.description }}</td>
					<td>{{ merch.origin_media }}</td>
					<td>{{ merch.stock }}</td>
					<td>{{ merch.price }}</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</template>

<script>
	export default {
		props: ["api_token"],
		data() {
			return {
				games: null,
				merchItems: null,
				notShown: "",
				selectedRow: null
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
						headers: {'Authorization': 'Bearer ' + this.api_token}
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
				if (this.selectedRow != null) this.selectedRow.classList.remove("selected")
				this.selectedRow = document.getElementById(itemName)
				this.selectedRow.classList.add("selected")
				this.$emit('update-selected', itemType, itemName)
			}
		}
	}
</script>
