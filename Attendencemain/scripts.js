const attendanceForm = document.getElementById('attendance-form');
const attendanceList = document.getElementById('attendance-list');

attendanceForm.addEventListener('submit', addAttendance);

function addAttendance(event) {
  event.preventDefault();
  const nameInput = document.getElementById('name');
  const courseInput = document.getElementById('course');
  const dateInput = document.getElementById('date');
  const name = nameInput.value;
  const course = courseInput.value;
  const date = dateInput.value;

  const attendance = {
    name: name,
    course: course,
    date: date,
  };

  const row = document.createElement('tr');
  row.innerHTML = `
    <td>${attendance.name}</td>
    <td>${attendance.course}</td>
    <td>${attendance.date}</td>
  `;
  attendanceList.appendChild(row);
  nameInput.value = '';
  courseInput.value = '';
  dateInput.value = '';
}