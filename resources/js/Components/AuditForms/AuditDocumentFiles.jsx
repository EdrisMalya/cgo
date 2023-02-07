import React from 'react'
import { fileSize } from '@/helper'
import { IconButton } from '@mui/material'
import DownloadIcon from '@mui/icons-material/Download'

const AuditDocumentFiles = ({ files, type, translate, lang }) => {
    return (
        <div>
            {files.length > 0 ? (
                <div className="mt-2">
                    {files.map((file, index) => (
                        <div className="inline-block border dark:border-gray-700 m-1 px-2 rounded-full text-xs">
                            <div className="flex items-center">
                                <p>
                                    {file.file_name}
                                    <span className="ml-1 text-gray-500">
                                        ({fileSize(file.file_size)})
                                    </span>
                                </p>
                                <a
                                    target="_blank"
                                    href={route('audit.file.download', {
                                        type: 'na',
                                        lang,
                                        lang,
                                        id: file.id,
                                        type: type,
                                        time: Date.now(),
                                    })}>
                                    <IconButton size="small">
                                        <DownloadIcon fontSize="10" />
                                    </IconButton>
                                </a>
                            </div>
                        </div>
                    ))}
                </div>
            ) : (
                <p className="text-center text-red-500 my-4">
                    {translate('No record found')}
                </p>
            )}
        </div>
    )
}

export default AuditDocumentFiles
