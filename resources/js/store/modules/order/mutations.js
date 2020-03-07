export default {
    setRoomsCount (state, value) {
        state.selectedRoomsCount = value
    },

    setSelectedComplex(state, value) {
      state.selectedComplexId = value
    },

    setSelectedLayoutId(state, value) {
        state.selectedLayoutId = value
    },

    pushSelectedRoom(state, value) {
        state.selectedRooms.push(value)
    }
}
