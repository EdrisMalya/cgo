import { Avatar, Chip } from '@mui/material'

const AuditDocumentMembers = ({ members, translate }) => {
    return (
        <div className="mt-4">
            <h2>{translate('Auditor members')}</h2>
            {members.length > 0 && (
                <div>
                    {members.map((member, index) => (
                        <Chip
                            className="m-1"
                            key={index}
                            variant={'outlined'}
                            label={member.name}
                            avatar={
                                <Avatar
                                    src={
                                        route().t.url +
                                        '/storage/' +
                                        member.image
                                    }
                                />
                            }
                        />
                    ))}
                </div>
            )}
        </div>
    )
}

export default AuditDocumentMembers
