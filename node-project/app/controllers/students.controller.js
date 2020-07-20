const mysql = require('mysql');
// connection configurations
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'students'
});

// connect to database
connection.connect(function (err) {
    if (err) throw err
    console.log('You are now connected with mysql database...')
})

// Create and Save a new Todo
exports.create = (req, res) => {
    // Validate request
    if (!req.body.name) {
        return res.status(400).send({
            message: "Students name cannot be empty"
        });
    }else if (!req.body.class) {
        return res.status(400).send({
            message: "Students class cannot be empty"
        });
    }
    else if (!req.body.mark) {
        return res.status(400).send({
            message: "Students mark cannot be empty"
        });
    } else if (!req.body.sex) {
        return res.status(400).send({
            message: "Students sexcannot be empty"
        });
    }

    var params = req.body;
    console.log(params);

    connection.query("INSERT INTO student SET ? ", params,
        function (error, results, fields) {
            if (error) throw error;
            return res.send({
                data: results,
                message: 'New student record has been created successfully.'
            });
        });
};

// Retrieve and return all todos from the database.
exports.findAll = (req, res) => {
    connection.query('select * from student',
        function (error, results, fields) {
            if (error) throw error;
            res.end(JSON.stringify(results));
        });
};

// Find a single todo with a id
exports.findOne = (req, res) => {

    connection.query('select * from student where id=?',
        [req.params.id],
        function (error, results, fields) {
            if (error) throw error;
            res.end(JSON.stringify(results));
        });
};

// Update a todo identified by the id in the request
exports.update = (req, res) => {
    // Validate request
    if (!req.body.name) {
        return res.status(400).send({
            message: "Students name cannot be empty"
        });
    }else if (!req.body.class) {
        return res.status(400).send({
            message: "Students class cannot be empty"
        });
    }
    else if (!req.body.mark) {
        return res.status(400).send({
            message: "Students mark cannot be empty"
        });
    } else if (!req.body.sex) {
        return res.status(400).send({
            message: "Students sexcannot be empty"
        });
    }

    console.log(req.params.id);
    console.log(req.body.name);
    connection.query('UPDATE `student` SET `name`=?,`class`=?,`mark`=?,`sex`=?   where `id`=?',
        [req.body.name, req.body.mark,req.body.class, req.body.sex,  req.params.id],
        function (error, results, fields) {
            if (error) throw error;
            res.end(JSON.stringify(results));
        });
};

// Delete a todo with the specified id in the request
exports.delete = (req, res) => {
    console.log(req.body);
    connection.query('DELETE FROM `student` WHERE `id`=?',
        [req.params.id], function (error, results, fields) {
            if (error) throw error;
            res.end('Record has been deleted successfully');
        });
};