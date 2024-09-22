create database task_manager;
use task_manager;

create table tasks_tbl (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_title VARCHAR(255) NOT NULL,
    tag VARCHAR(100),
    status VARCHAR(50),
    priority VARCHAR(50),
    start_date DATE,
    end_date DATE
);

insert into tasks_tbl (task_title, tag, status, priority, start_date, end_date) VALUES
('Design Database Schema', 'Planning', 'Completed', 'Medium', '2024-08-20', '2024-08-25'),
('Develop Backend API', 'Development', 'In Progress', 'High', '2024-09-01', '2024-09-10'),
('Implement Authentication', 'Security', 'Not Started', 'High', '2024-09-11', '2024-09-15'),
('UI/UX Design', 'Design', 'In Progress', 'Low', '2024-09-02', '2024-09-12'),
('Unit Test', 'Testing', 'Not Started', 'Medium', '2024-09-13', '2024-09-17'),
('Create homepage', 'Frontend', 'In Progress', 'High', '2024-09-01', '2024-09-03'),
('Set up database', 'Backend', 'Completed', 'Medium', '2024-08-20', '2024-08-21'),
('User login feature', 'Authentication', 'Not Started', 'High', '2024-09-05', '2024-09-07'),
('Fix header bug', 'Bug Fix', 'In Progress', 'Low', '2024-09-02', '2024-09-03'),
('Write documentation', 'Documentation', 'Not Started', 'Medium', '2024-09-10', '2024-09-11'),
('Fix Bugs in Task Manager', 'Bug Fix', 'Not Started', 'High', '2024-09-07', '2024-09-14'),
('Prepare Documentation', 'Documentation', 'Completed', 'Low', '2024-08-27', '2024-09-01'),
('Deploy Application', 'Deployment', 'Not Started', 'High', '2024-09-20', '2024-09-25');
