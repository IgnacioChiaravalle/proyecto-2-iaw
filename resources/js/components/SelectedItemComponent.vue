<template>
	<div class="details-container">

		<h2>{{itemName}}</h2>

		<div v-if="itemType == 'game' && itemName != null">
			<h3>Desarrolladores:</h3>
			<ul>
				<li v-for="dev in devs" :key="dev.dev_name" class="first-level-li">{{dev.dev_name}}</li>
			</ul>
			<h3>Disponibilidad en Consolas:</h3>
			<ul>
				<li v-for="cons in consoles" :key="cons.console_name" class="first-level-li">
					{{cons.console_name}}
					<ul class="sublist-ul">
						<li class="second-level-li">Copias Nuevas: {{cons.new_copies}}</li>
						<li class="second-level-li">Copias Usadas: {{cons.used_copies}}</li>
					</ul>
				</li>
			</ul>
			<div class="covers-div">
				<div class="cover-item cover-item-left">
					<label for="cover" class="image-label cover-label">Portada:<br></label>
					<img name="cover" v-bind:src="cover" alt="Portada del Juego">
				</div>

				<div class="cover-item cover-item-right">
					<label v-if="countercover != null" for="countercover" class="image-label cover-label">Contraportada:<br></label>
					<img v-if="countercover != null" name="countercover" v-bind:src="countercover" alt="Contraportada del Juego">
				</div>
			</div>
		</div>

		<div v-if="itemType == 'merch' && itemName != null">
			<h3>Categorías del Artículo:</h3>
			<ul>
				<li v-for="category in categories" :key="category.category_name" class="first-level-li">{{category.category_name}}</li>
			</ul>
			<div class="photo-div">
				<label for="photo-img" class="image-label photo-label">Foto del Artículo:<br></label>
				<img v-bind:src="photo" name="photo-img" alt="Foto del Artículo">
			</div>		
		</div>
		
	</div>
</template>

<script>
	const API_URI = "https://chiaravalle-iaw-proyecto2.herokuapp.com/api/"
	export default {
		props: ["api_token"],
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
			async searchSelectedData(itemType, itemName) {
				if (itemType == "game")
					await this.searchGameData(itemName)
				else
					await this.searchMerchData(itemName)
				this.itemName = itemName
				this.itemType = itemType
			},
			async searchGameData(itemName) {
				var URI = API_URI + "gamesforsale/getgamedevs/" + itemName
				this.devs = await this.executeAPIQuery(URI, "Developers")
				URI = API_URI + "gamesforsale/getgameconsoles/" + itemName
				this.consoles = await this.executeAPIQuery(URI, "Consoles")
				URI = API_URI + "gamesforsale/getgamecovers/" + itemName
				var bothCovers = await this.executeAPIQuery(URI, "Covers")
				this.cover = "data:image/*;base64," + bothCovers.cover
				this.countercover = bothCovers.counter_cover != null && bothCovers.counter_cover != "" ? "data:image/*;base64," + bothCovers.counter_cover : null
			},
			async searchMerchData(itemName) {
				var URI = API_URI + "merchforsale/getmerchcategories/" + itemName
				this.categories = await this.executeAPIQuery(URI, "Categories")
				URI = API_URI + "merchforsale/getmerchphoto/" + itemName
				var photoJSON = await this.executeAPIQuery(URI, "Photo")
				this.photo = "data:image/*;base64," + photoJSON.photo
			},

			async executeAPIQuery(URI, searched) {
				var toReturn = null
				await axios
					.get(
						URI, {
						headers: {'Authorization': 'Bearer ' + this.api_token}
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