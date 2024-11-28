function showSection(sectionId) {
    const sections = document.querySelectorAll('.table-container');
    sections.forEach(section => section.style.display = 'none');
    document.getElementById(sectionId).style.display = 'block';
}