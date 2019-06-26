$(function () {
    
    $('#main-container').load('projects.php');
    $('nav li.projects').on('click', function () {
        $('#main-container').load('projects.php');
    })
    $('nav li.users').on('click', function () {
        $('#main-container').load('users.php');
    })
    $('nav li.demands').on('click', function () {
        $('#main-container').load('demands.php');
    })
    $('nav li.history').on('click', function () {
        $('#main-container').load('history.php');
        $('section.history-item').on('click', function () {
            alert()
        })
    })
    $('nav li.setting').on('click', function () {
        $('#main-container').load('user-setting.php');
    })

})