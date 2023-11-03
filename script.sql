-- Tabela de Usuários
CREATE TABLE Usuarios (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL UNIQUE,
    Senha VARCHAR(100) NOT NULL
);

-- Tabela de Carros
CREATE TABLE Carros (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Modelo VARCHAR(50) NOT NULL,
    Placa VARCHAR(10) NOT NULL,
    DonoID INT,
    FOREIGN KEY (DonoID) REFERENCES Usuarios(ID)
);

-- Tabela de Vagas de Estacionamento
CREATE TABLE VagasEstacionamento (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NumeroVaga INT NOT NULL,
    Disponivel BOOLEAN DEFAULT TRUE
);

-- Tabela de Reservas
CREATE TABLE Reservas (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioID INT,
    VagaEstacionamentoID INT,
    DataHoraInicio DATETIME,
    DataHoraFim DATETIME,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID),
    FOREIGN KEY (VagaEstacionamentoID) REFERENCES VagasEstacionamento(ID)
);