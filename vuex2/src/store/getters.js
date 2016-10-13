export default{
	localidade: state => {
		return `${state.user.city} - ${state.user.state}`
	}
}