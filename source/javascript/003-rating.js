document.addEventListener("DOMContentLoaded", function(event) {
  //Опрос в сайдбар
  const sidebarAnswer = 2;
  let sidebarVote = document.querySelector('.js-sidebar-vote');
  let sidebarItems = document.querySelectorAll('.js-sidebar-item');
  let sidebarVoteLocal = localStorage.getItem('sidebar_vote');

  if (sidebarVoteLocal && sidebarVote) {
    //Показываем результаты
    if (sidebarVoteLocal == sidebarAnswer) {
      document.querySelector('.js-sidebar-item[data-q-css="' + sidebarAnswer + '"]').classList.add('vote-correct');  
    } else {
      document.querySelector('.js-sidebar-item[data-q-css="' + sidebarVoteLocal + '"]').classList.add('vote-wrong');
      document.querySelector('.js-sidebar-item[data-q-css="' + sidebarAnswer + '"]').classList.add('vote-correct');  
    }
  } else {
    if (sidebarVote) {
      sidebarItems.forEach(item => {
        item.addEventListener('click', () => {
          let sidebarItemData = item.dataset.qCss;
          localStorage.setItem('sidebar_vote', sidebarItemData);

          if (sidebarItemData == sidebarAnswer) {
            item.classList.add('vote-correct');
          } else {
            item.classList.add('vote-wrong');
            document.querySelector('.js-sidebar-item[data-q-css="' + sidebarAnswer + '"]').classList.add('vote-correct');
          }
        });
      })
    }  
  }
  

  //Опрос в публикации
  if (document.body.classList.contains('single')) {
    let postVoteItems = document.querySelectorAll('.js-vote-item');
    let postVote = document.querySelector('.js-post-vote');
    let postId = postVote.dataset.postId;  
    let postVoteLocal = localStorage.getItem('vote_post_'+postId);

    //Показываем результаты, если уже голосовал на странице
    if (localStorage.getItem('vote_post_'+postId)) {
      //Меняем цвет блока
      console.log(postVoteLocal);
      document.querySelector('.js-vote-item[data-vote-item="'+ postVoteLocal +'"] > div').classList.add('vote-active');
    }

    //Отслеживаем клик
    postVoteItems.forEach(item => {
      item.addEventListener('click', () => {
        // Проверяем голосовал ли уже или нет
        if (localStorage.getItem('vote_post_'+postId)) {
          console.log('уже голосовал');
          return;
        } else {
          //Куда нажал
          let itemMeta = item.dataset.voteItem;
          
          //Записываем в LocalStorage
          localStorage.setItem('vote_post_'+postId, itemMeta);

          // Отправляем запрос
          let data = {
            'action': 'vote_post_click_action',
            'postId': postId,
            'itemMeta': itemMeta,
          };
          // addFavToTable(data);
          jQuery.ajax({
            url: ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend : function(xhr) {
              console.log('Загружаю')
            },
            success : function(data) {
              if (data) {
                //Добавляем результат
                document.querySelector('.js-vote-item[data-vote-item="'+ itemMeta +'"] .js-vote-result').textContent = data;
                //Меняем цвет блока
                document.querySelector('.js-vote-item[data-vote-item="'+ itemMeta +'"] > div').classList.add('vote-active');              
              }
            }
          });
          return;
        }
        
      })
    })    
  }
  

 });