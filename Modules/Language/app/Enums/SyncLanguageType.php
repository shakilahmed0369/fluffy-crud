<?php

namespace Modules\Language\app\Enums;

enum SyncLanguageType:string
{
    case UPDATE = 'update';
    case CREATE = 'create';
    case DELETE = 'delete';
    case QUEUEABLE = '1'; // to make this false write 0
}
