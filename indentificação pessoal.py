def coletar_informacoes():

    nome = input (" Digite aqui seu nome por favor! ")
    idade = input (" Digite sua idade por favor! ")
    localização = input (" Digite seu endereço ")
    profissão = input (" Digite sua profissão ")
    hobbie = input (" Voce tem algum hobbie? ")

    print("\ninformações coletadas:")
    print(f"Nome Completo: {nome}")
    print(f"Idade: {idade}")
    print(f"Localização:{localização}")
    print(f"Profissão: {profissão}")
    print(f"Hobbie:{hobbie}")

coletar_informacoes()