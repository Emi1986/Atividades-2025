class Cachorro:
    def _init_(self, nome, raca, comida):
        self.nome = nome
        self.raca = raca
        self.comida = comida
        self.acordada = True
        self.feliz = False

    def comer(self):
        if self.comida > 0:
            self.comida -= 1
            self.feliz = True
            print(f"{self.nome} comeu e agora está feliz")
        else:
            print(f"{self.nome} não tem comida suficiente")

    def dormir(self):
        self.acordada = False
        print(f"{self.nome} foi dormir")

    def acordar(self):
        self.acordada = True
        print(f"{self.nome} acordou")

    def brincar(self):
        self.feliz = True
        print(f"{self.nome} brincou e agora está feliz!")

    def ignora(self):
        self.feliz = False
        print(f"{self.nome} está triste porque foi ignorado")

    def latir(self):
        if self.acordada:
            print(f"{self.nome} está latindo! AU AU!")
        else:
            print(f"{self.nome} está dormindo e não pode latir")

# Criando os objetos Cachorro
Cachorro1 = Cachorro("Rex", "Labrador", 3)
Cachorro2 = Cachorro("Bolt", "Pastor Alemão", 2)

# Interagindo com o Cachorro1
Cachorro1.comer()
Cachorro1.brincar()
Cachorro1.latir()
Cachorro1.dormir()
Cachorro1.acordar()

# Interagindo com o Cachorro2
Cachorro2.ignora()  # Método corrigido
Cachorro2.comer()
Cachorro2.latir()