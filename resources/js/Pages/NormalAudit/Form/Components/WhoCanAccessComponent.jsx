import React from 'react'
import Select2 from '@/Components/Select2'
import { CGO_REDUCER_ACTIONS } from '@/Pages/CGOReducer/CGOReducerActions'
import { Avatar, Chip } from '@mui/material'
import ProtectedComponent from '@/Components/ProtectedComponent'

const WhoCanAccessComponent = ({
    setData,
    formData,
    data,
    translate,
    errors,
    roles,
    dispatch,
    normalAudit,
}) => {
    const [authorizedUsers, setAuthorizedUsers] = React.useState([])

    React.useEffect(() => {
        if (authorizedUsers.length > 0) {
            setData('authorize_users', authorizedUsers)
        } else {
            setData('authorize_users', [])
        }
    }, [authorizedUsers])

    React.useEffect(() => {
        if (normalAudit) {
            const authorize_users = normalAudit.data.authorize_users.map(
                (user, index) => {
                    return {
                        name: user.name,
                        id: user.id,
                        image: user.image,
                    }
                },
            )
            dispatch({
                type: CGO_REDUCER_ACTIONS.WHO_CAN_ACCESS_CHANGED,
                payload: {
                    who_can_access: authorize_users,
                },
            })
            setAuthorizedUsers(authorize_users)
        }
    }, [normalAudit])

    const returnBody = () => {
        return (
            <>
                <Select2
                    data={roles}
                    disableIgnoreIds={true}
                    label={translate('Who can access')}
                    value={formData.role_id}
                    otherOptions={'users'}
                    onChange={value => {
                        dispatch({
                            type: CGO_REDUCER_ACTIONS.WHO_CAN_ACCESS_CHANGED,
                            payload: {
                                who_can_access: value.otherOptions,
                            },
                        })
                        setAuthorizedUsers(value.otherOptions)
                        setData('role_id', value)
                    }}
                    selectLabel={'name'}
                    selectValue={'id'}
                />
                {formData.role_id && (
                    <div
                        className={
                            'mt-3 border-l ml-3 pl-3 dark:border-gray-500 '
                        }>
                        <p>{translate('Allowed users for this role')}</p>
                        {data.authorize_users.length > 0 ? (
                            <div className={'mt-4 mb-7'}>
                                {data.authorize_users?.map((user, index) => (
                                    <Chip
                                        key={index}
                                        className={'!m-1'}
                                        variant={'outlined'}
                                        avatar={
                                            <Avatar
                                                src={
                                                    route().t.url +
                                                    '/storage/' +
                                                    user.image
                                                }
                                            />
                                        }
                                        label={`${user.name} ${
                                            typeof user?.last_name !==
                                            'undefined'
                                                ? user?.last_name
                                                : ''
                                        }`}
                                        onDelete={() => {
                                            let new_authorize_users =
                                                data.authorize_users.filter(
                                                    obj => {
                                                        return (
                                                            user.id !== obj.id
                                                        )
                                                    },
                                                )
                                            dispatch({
                                                type: CGO_REDUCER_ACTIONS.WHO_CAN_ACCESS_CHANGED,
                                                payload: {
                                                    who_can_access:
                                                        new_authorize_users,
                                                },
                                            })
                                            setAuthorizedUsers(
                                                new_authorize_users,
                                            )
                                        }}
                                    />
                                ))}
                            </div>
                        ) : (
                            <p className={'text-center text-red-500 my-4'}>
                                {translate('No record found')}
                            </p>
                        )}
                    </div>
                )}
            </>
        )
    }

    return (
        <div className={'my-3'}>
            {normalAudit ? (
                <ProtectedComponent role={'edit-report-edit-access'}>
                    {returnBody()}
                </ProtectedComponent>
            ) : (
                returnBody()
            )}
        </div>
    )
}

export default WhoCanAccessComponent
