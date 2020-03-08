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

    setSelectedRoom(state, {value, roomTypePivotId}) {
        state.selectedRooms = {...state.selectedRooms, ...{ [roomTypePivotId]: value }};
    },

    setOrderResult(state, value) {
        state.orderResult = value
    }
}
