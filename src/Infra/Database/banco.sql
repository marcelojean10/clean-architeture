CREATE TABLE student (
    cpf TEXT PRIMARY KEY,
    name TEXT,
    email TEXT
);
CREATE TABLE phones (
    ddd TEXT,
    number TEXT,
    cpf_student TEXT,
    PRIMARY KEY (ddd, number),
    FOREIGN KEY(cpf_student) REFERENCES student(cpf)
);
CREATE TABLE indication (
    cpf_indication TEXT,
    cpf_indicated TEXT,
    data_indication TEXT,
    PRIMARY KEY (cpf_indication, cpf_indicated),
    FOREIGN KEY(cpf_indicated) REFERENCES student(cpf),
    FOREIGN KEY(cpf_indication) REFERENCES student(cpf)
);