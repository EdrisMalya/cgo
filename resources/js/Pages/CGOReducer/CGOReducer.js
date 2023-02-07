import { CGO_REDUCER_ACTIONS } from '@/Pages/CGOReducer/CGOReducerActions'

export const CGOReducer = (state, action) => {
    switch (action.type) {
        case CGO_REDUCER_ACTIONS.FILE_CHANGED:
            return {
                ...state,
                files: Object.entries(action.payload.files),
            }
        case CGO_REDUCER_ACTIONS.FILE_REMOVED:
            return {
                ...state,
                files: action.payload.files,
            }
        case CGO_REDUCER_ACTIONS.SHOW_BUTTON_CHANGED:
            return {
                ...state,
                show_button: action.payload.result,
            }
        case CGO_REDUCER_ACTIONS.AUDITOR_TEAM_CHANGED:
            return {
                ...state,
                audited_by: action.payload.team_id,
                auditor_members: action.payload.members,
            }
        case CGO_REDUCER_ACTIONS.AUDITOR_TEAM_MEMBER_CHANGED:
            return {
                ...state,
                auditor_members: action.payload.members,
            }
        case CGO_REDUCER_ACTIONS.WHO_CAN_ACCESS_CHANGED:
            return {
                ...state,
                authorize_users: action.payload.who_can_access,
            }
    }
}
