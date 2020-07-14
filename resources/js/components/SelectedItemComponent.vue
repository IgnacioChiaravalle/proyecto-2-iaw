<template>
	<div>
		
		<div>
			<h1>Item Selected Component</h1>
		</div>

		<div>
			<h2>I'm an example component.</h2>
		</div>

		<div v-if="itemType == 'game' && itemName != null">
			<h3>Desarrolladores:</h3>
			<ul>
				<li v-for="dev in devs" :key="dev.dev_name">{{dev.dev_name}}</li>
			</ul>
			<h3>Disponibilidad en Consolas:</h3>
			<ul>
				<li v-for="cons in consoles" :key="cons.console_name">
					{{cons.console_name}}
					<ul>
						<li>Copias Nuevas: {{cons.new_copies}}</li>
						<li>Copias Usadas: {{cons.used_copies}}</li>
					</ul>
				</li>
			</ul>
			<div class="covers-div">
				<label for="cover">Portada:<br></label>
				<img name="cover" src="data:image/*;base64, :cover" alt="Portada del Juego">

				<label for="countercover">Contraportada:<br></label>
				<img v-if="counter_cover != null" name="countercover" src="data:image/*;base64, :countercover" alt="Contraportada del Juego">
				<img v-else name="countercover" src="" alt="Contraportada del Juego">
			</div>
		</div>

		<div v-if="itemType == 'merch' && itemName != null">
			<h3>Categorías del Artículo:</h3>
			<ul>
				<li v-for="category in categories" :key="category.category_name">{{category.category_name}}</li>
			</ul>
			<div class="photo-div">
				<img src="data:image/*;base64, :photo" alt="Foto del Artículo">
			</div>		
		</div>
		
	</div>
</template>

<script>
	export default {
		data() {
			return {
				itemType: "game",
				itemName: null,
				devs: null,
				consoles: null,
				cover: null,
				countercover: null,
				categories: null,
				photo: null
			}
		},
		methods: {
			searchSelectedData(itemType, itemName) {
				if (itemType == "game")
					this.searchGameData(itemName)
				else
					this.searchMerchData(itemName)
				this.itemName = itemName
				this.itemType = itemType
			},
			searchGameData(itemName) {
				var URI = 'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/gamesforsale/getgamedevs/' + itemName
				this.devs = this.executeAPIQuery(URI, "Developers")
				URI = 'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/gamesforsale/getgameconsoles/' + itemName
				this.consoles = this.executeAPIQuery(URI, "Consoles")
				URI = 'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/gamesforsale/getgamecovers/' + itemName
				var bothCovers = this.executeAPIQuery(URI, "Covers")
				this.cover = bothCovers.cover
				this.countercover = bothCovers.counter_cover
			},
			searchMerchData(itemName) {
				var URI = 'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/merchforsale/getmerchcategories/' + itemName
				this.categories = this.executeAPIQuery(URI, "Categories")
				URI = 'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/merchforsale/getmerchphoto/' + itemName
				this.photo = this.executeAPIQuery(URI, "Photo")
			},

			executeAPIQuery(URI, searched) {
				var toReturn = null
				axios
					.get(URI, {
						headers: {'Authorization': 'Bearer administrador'}
					})
					.then(response => {
						toReturn = response.data
					})
					.catch(e => console.log("Error finding " + searched + ":\n" + e))
				return toReturn
			}
		}
	}
</script>