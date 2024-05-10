document.addEventListener('DOMContentLoaded', () => {
    fetch('http://localhost/backend/index.php')
        .then(response => response.json())
        .then(data => {
            const coursesContainer = document.getElementById('courses');
            data.results.forEach(course => {
                const courseElement = document.createElement('div');
                courseElement.className = 'course';
                courseElement.innerHTML = `
                    <h2>${course.title}</h2>
                    <p>${course.headline}</p>
                    <a href="https://www.udemy.com${course.url}" target="_blank">Go to Course</a>
                `;
                coursesContainer.appendChild(courseElement);
            });
        });
});
