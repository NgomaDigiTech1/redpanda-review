<script>
    // Filtering products
    const list = document.querySelector('#lists');
    const searchBar = document.forms['search-products'].querySelector('input');
    
    searchBar.addEventListener('keyup', function(e){
        const term = e.target.value.toLowerCase();

        const products = list.getElementsByTagName('a');
        Array.from(products).forEach(function(product){
            const title = product.firstElementChild.textContent;
            if(title.toLowerCase().indexOf(term)!= -1){
               product.parentNode.parentNode.style.display = 'flex';
            }else {
                product.parentNode.parentNode.style.display = 'none';
            }
        })
    });
</script>