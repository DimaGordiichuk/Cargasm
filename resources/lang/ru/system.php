<?php
return [
    'domain' => [
        'error' => 'Домен не найден.'
    ],
    'photo' => [
        'share' => [
            'already' => 'Этой фотографией вы уже поделились ранее.',
            'success' => 'Вы успешно поделились фотографией.',
            'self' => 'Невозможно поделиться свей фотографией.'
        ],
    ],
    'order' => [
        'error' => 'Некорректный запрос'
    ],
    'status' => [
        'allowed' => 'Разрешен',
        'forbidden' => 'Не разрешено',
    ],
    'notification' => [
        'success' => 'Данные успешно сохранены!',
    ],
    'login' => [
        'already' => 'Логин уже занят.'
    ],
    'nickname' => [
        'already' => 'Данный никнейм уже занят.'
    ],
    'update' => [
        'success' => 'Данные успешно обновлены!',
    ],
    'store' => [
        'success' => 'Данные успешно сохранены!',
    ],
    'destroy' => [
        'success' => 'Данные успешно удалены!',
        'error' => 'Ошибка удаления. У вас нет доступа!',
        'error_children' => 'Ошибка удаления! Чтобы удалить текущий элемент, вам нужно удалить всех его дочерних элементов.',
    ],
    'feedback' => [
        'store' => [
            'success' => 'Ваш отзыв опубликован.'
        ]
    ],
    'email' => [
        'fail' => 'Ошибка',
        'already' => 'Ваша почта уже была успешно подтверждена ранее.',
        'send' => 'Письмо с подтверждением отправлено.',
        'verify' => 'Почта успешно подтверждена!',
        'verify_success' => 'Ваш адрес электронной успешно подтвержден.',
        'check' => 'Проверьте свою электронную почту, чтобы подтвердить её.',
        'unverify' => 'Ваша электронная почта не подтверждена.'
    ],
    'post' => [
        'moderate' => 'Статья будет опубликована после модерации.',
        'success' => 'Статья опубликована',
        'update' => 'Статья успешно обновлена.',
        'delete' => 'Статья удалена.',
        'denies' => 'У вас нет прав на редактирование этой статьи.',
        'status' => 'Статус статьи изменен!',
        'statuses' => [
            'draft' => 'Черновик',
            'published' => 'Опубликован',
            'unpublished' => 'Снятые с публикации'
        ],
    ],
    'event' => [
        'author' => [
            'user' => 'Пользователь',
            'external' => 'Внешний источник',
        ],
        'photo' => [
            'save' => 'Фотографии к событию успешно добавлены!',
            'forbidden' => 'Добавление фото к данному событию запрещено.',
        ] ,
        'user' => [
            'status' => 'Статус пользователя изменен.',
        ] ,
        'confirm' => [
            'auto' => 'Не нужно подтверждение',
            'manually' => 'Подтверждение вручную',
        ],
        'privacy' => [
            'open' => 'Открытое',
            'close' => 'Закрытое',
        ],
        'age' => [
            '16' => '16+',
            '18' => '18+',
            'all' => 'Не имеет значения',
        ],
        'gender' => [
            'male' => 'Мужской',
            'female' => 'Женский',
            'all' => "Не имеет значения",
        ],
        'attend' => [
            'self' => 'Это Ваше событие!',
            'send' => 'Заявка на участие в мероприятии отправлена',
            'success' => 'Заявка на участие успешно подана!',
            'close' => 'Закрытое событие',
            'participant' => 'Теперь вы участник данного события!',
            'cancel' => 'Вы больше не участник данного события',
            'annulment' => 'Заявка на событие отменена.',
        ] ,
        'status' => [
            'waiting' => 'статус ожидания',
            'active' => 'статус активный',
            'passed' => 'статус пройдено',
        ],
        'share' => [
            'already' => 'Событием уже поделились',
            'success' => 'Событием успешно поделились'
        ],
    ],
    'like' => [
        'already' => [
            'save' => 'Лайк уже поставлен.',
            'delete' => 'Лайк уже удален.',
        ],
        'save' => 'Лайк поставлен!',
        'delete' => 'Лайк удален.'
    ],
    'share' => [
        'already' => 'Статьей уже поделились',
        'success' => 'Статьей успешно поделились',
        'self' => 'Невозможно поделиться своей сущностью'
    ],
    'complaint' => [
        'already' => 'Жалобу можно отправлять только один раз в день.',
        'success' => 'Ваша жалоба успешно отправлена.',
        'self' => 'Не жалуйстесь на себя, лучше исправьтесь!'
    ],
    'favorite' => [
        'add' => 'Статья добавлена в Избранное!',
        'remove' => 'Статья удалена из Избранного.'
    ],
    'comment' => [
        'save' => 'Комментарий сохранен.',
        'update' => 'Комментарий обновлен.',
        'delete' => 'Комментарий удален.',
        'denies' => 'У вас нет прав на редактирование комментария.',
        'permission' => 'Невозможно добавить коментарий.'
    ],
    'translation' => [
        'isset' => 'Перевод для статьи уже существует'
    ],
    'service' => [
        'moderate' => 'Сервис будет опубликован после модерации.',
        'denies' => 'Вы не можете создавать или обновлять данные.',
        'update' => 'Данные СТО успешно обновлены!',
        'delete' => 'СТО удалено.'
    ],
    'rating' => [
        'add' => 'Ваш отзыв был успешно добавлен.',
        'permission' => 'Невозможно добавить отзыв.',
        'denies' => 'У вас нет прав на редактирование отзыва.',
        'delete' => 'Ваш отзыв удален.'
    ],
    'subscription' => [
        'add' => 'Вы успешно подписались на обновления!',
        'already' => 'Подписка уже существует.',
        'denies' => 'Подписка не найдена.',
        'unsubscribe' => 'Подписка была отменена.',
        'error' => 'Невозможно создать подписку.'
    ],
    'user' => [
        'password' => [
            'update' => 'Пароль успешно обновлен.'
        ],
        'update' => 'Данные успешно обновлены.',
        'email' => [
            'already' => 'Этот email уже занят.',
        ],
        'phone' => [
            'already' => 'Этот телефон уже занят.',
        ],
    ],
    'car' => [
        'save' => 'Автомобиль сохранен.',
        'add' => 'Заявка на добавление авто отправлена',
        'denies' => 'Вы не можете редактировать автомобиль.',
        'delete' => 'Данные об автомобиле удалены.',
        'status' => [
            'moderate' => 'На модерации',
            'published' => 'Одобрено',
        ],
    ],
    'chat' => [
        'read' => 'Сообщение прочитанные.',
        'message' => [
            'send' => 'Сообщение успешно отправлено!',
            'update' => 'Сообщение обновлено.',
            'delete' => 'Сообщение удалено.'
        ],
        'conversation' => [
            'delete' => 'Диалог удалён.',
            'create' => 'Диалог создан'
        ],
        'self' => 'Вы не можете отправить сообщение самому себе! Да и зачем…',
        'denies' => 'У вас нет прав на редактирование сообщения.',
        'banned' =>  'Пользователь вас заблокировал.'
    ],
    'ban' => [
        'already' => 'Пользователь уже забанен!',
        'success' => 'Вы заблокировали данного пользователя.',
        'not-banned' => 'Пользователь не забанен',
        'delete' => 'Вы разблокировали данного пользователя.'
    ],
    'media' => [
        'delete' => 'Медиа-файл удален',
        'error' => 'Ошибка при удалении.',
    ],

    'actions' => [
        'store' => [
            'success' => 'Данные успешо сохранены!',
        ],
        'update' => [
            'success' => 'Данные успешно обновлены!',
        ],
        'destroy' => [
            'success' => 'Данные успешно удалены!',
            'error' => 'Ошибка удаления. Возможно у вас нет прав или доступа!',
            'error_children' => 'Ошибка удаления! Для удаления текущего элемента, нужно удалить все его дочернии элементы.',
        ],
    ],
];