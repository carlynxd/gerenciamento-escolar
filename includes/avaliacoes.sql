CREATE DATABASE escola;

USE escola;

CREATE TABLE avaliacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT,
    disciplina_id INT,
    nota FLOAT,
    data_avaliacao DATE,
    FOREIGN KEY (aluno_id) REFERENCES alunos(id),
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id)
);
