require('./bootstrap');

window.Vue = require('vue');

Vue.component('api-token-component', require('./components/APITokenComponent.vue').default);
Vue.component('display-all-component', require('./components/DisplayAllComponent.vue').default);
Vue.component('selected-item-component', require('./components/SelectedItemComponent.vue').default);

const parentComponent = new Vue({
	data() {
		return {
			visible: false,
			api_token: ""
		}
	},
	el: '#parent-component',
	methods: {
		async verifyToken(apiToken) {
			var user = await this.getUser(apiToken)
			if (Object.keys(user).length > 0) {
				this.visible = true
				this.api_token = apiToken
			}
		},
		updateSelected(itemType, itemName) {
			this.$refs.selectedItemComponent.searchSelectedData(itemType, itemName)
		},

		async getUser(apiToken) {
			var toReturn = {}
			await axios
				.get(
					'https://chiaravalle-iaw-proyecto2.herokuapp.com/api/user', {
					headers: {'Authorization': 'Bearer ' + apiToken}
				})
				.then(response => {
					toReturn = response.data
				})
				.catch(e => {
					this.visible = false
					this.apiToken = ""
					alert("¡El Token para la API ingresado es inválido!")
				})
			return toReturn
		}
	}
});

