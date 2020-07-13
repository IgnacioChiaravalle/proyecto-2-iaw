<template>
	<div>
		
		<div>
			<h1>Item Selected Component</h1>
		</div>

		<div>
			<h2>I'm an example component.</h2>
		</div>

		<div>
			<h3>{{itemType}}</h3>
			<h3>{{itemName}}</h3>
		</div>
		
	</div>
</template>

<script>
	export default {
		data() {
			return {
				itemType: "game",
				itemName: "null"
			}
		},
		methods: {
			searchSelectedData(itemType, itemName) {
				console.log("hi")
				this.itemType = itemType
				this.itemName = itemName
			}
		}
	}
</script>