import React, { useEffect, useRef } from 'react'
import { fileSize } from '@/helper'
import { IconButton } from '@mui/material'
import { XCircleIcon } from '@heroicons/react/24/outline'
import { CGO_REDUCER_ACTIONS } from '@/Pages/CGOReducer/CGOReducerActions'
import swal from 'sweetalert'
import { useRecoilState } from 'recoil'
import { fullPageLoading } from '@/atoms/fullPageLoading'
import { useForm, usePage } from '@inertiajs/inertia-react'

const NaSelectFilesComponent = ({
    translate,
    data,
    dispatch,
    setData,
    normalAuditForm,
    file_extensions,
}) => {
    const loading = useRecoilState(fullPageLoading)
    const ref = useRef()
    const { lang } = usePage().props
    const handleFilesChanged = event => {
        dispatch({
            type: CGO_REDUCER_ACTIONS.FILE_CHANGED,
            payload: {
                files: event.target.files,
            },
        })
        setData('files', event.target.files)
    }

    const { delete: destroy } = useForm()

    const removeFileFromList = (file, type = 'from_array') => {
        switch (type) {
            case 'from_array':
                let new_data = data.files.filter(obj => {
                    return obj[1]?.name !== file
                })
                dispatch({
                    type: CGO_REDUCER_ACTIONS.FILE_REMOVED,
                    payload: {
                        files: new_data,
                    },
                })
                setData('files', new_data)
                break
            case 'from_db':
                swal({
                    icon: 'info',
                    title: translate('Are you sure'),
                    buttons: true,
                }).then(res => {
                    if (res) {
                        loading[1](true)
                        destroy(
                            route('normal-audit.destroy', {
                                normal_audit: normalAuditForm.data.id,
                                lang,
                                type: 'delete_file',
                                file_id: file,
                            }),
                            {
                                onSuccess: () => {
                                    loading[1](false)
                                },
                            },
                        )
                    }
                })
        }
    }

    /*
    React.useEffect(() => {
        if (normalAuditForm) {
            dispatch({
                type: CGO_REDUCER_ACTIONS.FILE_REMOVED,
                payload: {
                    files: [1, 2, 3],
                },
            })
        }
    }, [normalAuditForm])
*/

    return (
        <div>
            <div
                onClick={() => {
                    ref.current.click()
                }}
                className={
                    'border select-none border-dashed dark:border-gray-600 shadow-lg p-4 mt-5 rounded-3xl text-center text-sm cursor-pointer hover:bg-gray-800'
                }>
                {translate('Browser files')}
                <p className={'text-xs mt-2 text-gray-400'}>
                    {translate('Allowed files')}: (
                    {file_extensions?.data?.map(
                        extension => extension.name + ', ',
                    )}
                    )
                </p>
            </div>
            <br />
            {data.files.length > 0 && (
                <div className={'mt-4'}>
                    <p>{translate('Attached files')}</p>
                    <p className={'text-sm'}>
                        {translate(
                            'Files greater then 10MB will not be uploaded',
                        )}
                    </p>
                    <br />
                    {data.files?.map(item => (
                        <span
                            key={item[1].name}
                            className={`m-1 inline-block rounded-full border  py-1 px-3 text-center text-sm ${
                                item[1].size > 10485760 &&
                                'border-red-500 text-red-500'
                            }`}>
                            <div className={'flex items-center'}>
                                <div className={'flex-1'}>
                                    <p>
                                        {item[1].name}{' '}
                                        <span className={'text-xs'}>
                                            ({fileSize(item[1]?.size)})
                                        </span>
                                        <br />
                                    </p>
                                </div>
                                <div>
                                    <IconButton
                                        onClick={() =>
                                            removeFileFromList(item[1].name)
                                        }
                                        size={'small'}>
                                        <XCircleIcon className={'h-4'} />
                                    </IconButton>
                                </div>
                            </div>
                        </span>
                    ))}
                </div>
            )}
            {normalAuditForm && (
                <div className={`${data.files.length < 1 && 'mt-4'}`}>
                    {normalAuditForm.data.files.map((file, index) => (
                        <span
                            key={index}
                            className={`m-1 inline-block rounded-full border  py-1 px-3 text-center text-sm `}>
                            <div className={'flex items-center'}>
                                <div className={'flex-1'}>
                                    <p>
                                        {file.file_name}{' '}
                                        <span className={'text-xs'}>
                                            ({fileSize(file.file_size)})
                                        </span>
                                        <br />
                                    </p>
                                </div>
                                <div>
                                    <IconButton
                                        onClick={() =>
                                            removeFileFromList(
                                                file.id,
                                                'from_db',
                                            )
                                        }
                                        size={'small'}>
                                        <XCircleIcon className={'h-4'} />
                                    </IconButton>
                                </div>
                            </div>
                        </span>
                    ))}
                </div>
            )}
            <input
                onChange={handleFilesChanged}
                multiple={true}
                ref={ref}
                className={'hidden'}
                type={'file'}
            />
        </div>
    )
}

export default NaSelectFilesComponent
