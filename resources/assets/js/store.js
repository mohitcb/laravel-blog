export default {
	state:{
		count:0,
		todos:[
			{body:'Test-1',done:false},
			{body:'Test-2',done:true},
			{body:'Test-3',done:false}
			]
	},

	mutations:{
		increment(state){
			state.count++;
		}
	},

	actions:{
		increment(context){
			// setTimeout(() => {
				context.commit('increment');
			// },3000);
		}
	},

	getters:{
		sqrt(state){
			return Math.sqrt(state.count);
		}
	}
};