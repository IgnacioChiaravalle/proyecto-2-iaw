require('./bootstrap');

window.Vue = require('vue');

Vue.component('display-all-component', require('./components/DisplayAllComponent.vue').default);
Vue.component('selected-item-component', require('./components/SelectedItemComponent.vue').default);

const displayAll = new Vue({
	el: '#display-all',
	methods: {
		updateSelected(itemType, itemName) {
			this.$refs.selected.searchSelectedData(itemType, itemName)
		}
	}
});

