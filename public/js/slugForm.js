const slugForm = () => {
    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    const parentSlug = slug.parentElement;
    const errorMessageSlug = slug.nextElementSibling;
    const iconSlug = slug.nextElementSibling.nextElementSibling.children[0];
    let timeout = null;

    title.addEventListener('input', (event) => {
        timeout && clearTimeout(timeout);
        const rawText = event.target.value;
        const parseText = () => {
            const lowCase = rawText.toLowerCase().split(' ');

            const loop = () => {
                const currentIndex = lowCase.findIndex(find => find === '');
                if (currentIndex === -1) return
                lowCase.splice(currentIndex, 1);
                loop();
            }
            loop()
            return lowCase.join('-').toString();
        }
        const getParseTest = parseText()
        slug.value = getParseTest
        parentSlug.classList.remove('valid');
        parentSlug.classList.remove('invalid');
        if(slug.value.length === 0) return
        timeout = setTimeout(() => {
            fetch(`/dashboard/posts/checkSlug?slug=${getParseTest}`)
                .then(res => res.json())
                .then(res => {
                    if(res.slug === false){
                        parentSlug.classList.add('invalid');
                        errorMessageSlug.innerHTML = 'This slug has been used.';
                        iconSlug.innerHTML = 'error';
                    } else {
                        parentSlug.classList.add('valid');
                        errorMessageSlug.innerHTML = 'Available';
                        iconSlug.innerHTML = 'check_circle';
                    }
                });
        }, 800);
    });
}

slugForm();