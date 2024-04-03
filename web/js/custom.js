    //? Recobra el estado del left menu
    (function() {
        if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' sidebar-collapse';
        }
    })();

    (function() {
        //? Guarda en localStorage el estado de left menu
        $('#hamburger').click(function(event) {
            event.preventDefault();
            if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
                localStorage.setItem('sidebar-toggle-collapsed', '');
            } else {
                localStorage.setItem('sidebar-toggle-collapsed', '1');
            }
        });
    })();

    //? Recobra el estado del tema (claro-oscuro)
    (function() {
        if (Boolean(localStorage.getItem('dark-mode-enable'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' dark-mode';
            var i = document.getElementById('theme-icon');
            i.className = i.className + ' fa-sun';
        } else {
            var i = document.getElementById('theme-icon');
            i.className = i.className + ' fa-moon';
        }
    })();

    (function() {
        //? Guarda en localStorage el estado del tema
        $('#theme-switch').click(function(event) {
            event.preventDefault();
            if (Boolean(localStorage.getItem('dark-mode-enable'))) {
                localStorage.setItem('dark-mode-enable', '');
                location.reload();
            } else {
                localStorage.setItem('dark-mode-enable', '1');
                location.reload();
            }
        });
    })();