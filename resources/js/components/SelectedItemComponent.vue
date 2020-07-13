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
		props: {
			itemType: {
				type: String,
				required: true
			},
			itemName: {
				type: String,
				required: true
			}
		}
	}
</script>