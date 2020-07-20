module.exports = (app) => {
    const students = require('../controllers/students.controller.js');

    // Create a new student
    app.post('/api/v1/student', students.create);

    // Retrieve all students
    app.get('/api/v1/student', students.findAll);

    // Retrieve a single student by id
    app.get('/api/v1/student/:id', students.findOne);

    // Update a student with id
    app.put('/api/v1/student/:id', students.update);

    // Delete a student by id
    app.delete('/api/v1/student/:id', students.delete);
}