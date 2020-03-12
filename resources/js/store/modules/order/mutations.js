export default {
    setRoomsCount (state, value) {
        state.selectedRoomsCount = value
    },

    setSelectedComplex(state, value) {
      state.selectedComplexId = value
    },

    setSelectedCustomComplex(state,value){
        state.customComplex=value;
    },

    setSelectedLayoutId(state, value) {
        state.selectedLayoutId = value
    },

    setSelectedRoom(state, {value, roomTypePivotId}) {
        state.selectedRooms = {...state.selectedRooms, ...{ [roomTypePivotId]: value }};
    },

    setOrderResult(state, value) {
        state.orderResult = value
    },

    setClientName(state, value) {
        state.clientName = value;
    },

    setPhone(state, value) {
        state.phone = value;
    },
    setCustomComplex(state,value){
        state.customComplex = value;
    },

    switchCustomRoomType(state, payload ) {
        if (state.customRoomTypes.some((roomType) => roomType.id === payload.id)) {
            state.customRoomTypes = state.customRoomTypes
              .filter((item) => item.id !== payload.id)
        } else {
            state.customRoomTypes.push(payload)
        }
    }
}
