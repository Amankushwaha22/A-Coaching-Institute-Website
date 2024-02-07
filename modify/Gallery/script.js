document.addEventListener('DOMContentLoaded', function () {
    const imageContainer = document.getElementById('imageContainer');

    // Replace these placeholder URLs with your actual image URLs
    const imageUrls = [
        '1.jpg',
        '2.jpg',
        '3.jpg',
        '4.jpg',
        '5.jpg',
        '6.jpg',
        '7.jpg',
        '8.jpg',
        '9.jpg',
        '10.jpg',
        '11.jpg',
        '12.jpg',
        '13.jpg',
        '14.jpg',
        '15.jpg',
    ];

    imageUrls.forEach((url) => {
        const thumbnail = document.createElement('img');
        thumbnail.src = url;
        thumbnail.classList.add('img-thumbnail');
        imageContainer.appendChild(thumbnail);
    });
});
