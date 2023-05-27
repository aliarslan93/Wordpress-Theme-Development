document.addEventListener("DOMContentLoaded", function(){
    if (window.innerWidth > 992) {
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            everyitem.addEventListener('mouseover', function(e){
                var el_link = this.querySelector('a[data-bs-toggle]');
                if(el_link != null){
                    var nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }

            });
            everyitem.addEventListener('mouseleave', function(e){
                var el_link = this.querySelector('a[data-bs-toggle]');

                if(el_link != null){
                    var nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }


            })
        });

    }
});

document.addEventListener('click',function(e){
    // Hamburger menu
    if(e.target.classList.contains('hamburger-toggle')){
        e.target.children[0].classList.toggle('active');
    }
});