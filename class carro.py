
class Carro:
  def __init__(self, modelo, ano, velocidade, cor, combustivel):
  self.modelo = modelo
  self.ano = ano
  self.velocidade = velocidade
  self.cor = cor
  self.combustivel = combustivel

# Criando um objeto Carro
meu_carro = Carro("Sedan", 2023, 120, "Vermelho", "Gasolina")

# Acessando os atributos
print(meu_carro.modelo) # Saída: Sedan
print(meu_carro.ano) # Saída: 2023
print(meu_carro.velocidade) # Saída: 120
print(meu_carro.cor) # Saída: Vermelho
print(meu_carro.combustivel) # Saída: Gasolina

