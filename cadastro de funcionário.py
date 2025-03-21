def coletar_informacoes():

    #Cadastro de fumcionário
    nome = input ("Digite aqui o seu nome")
    cargo = input ("Digite aqui seu cargo")
    empresa = input ("Dgite aqui sua empresa")
    salario = input ("Digite aqui seu salario atual")
    tempo = input ("Digite aqui há quanto tempo trabalha nessa empresa")

    print("\ninformações coletadas:")
    print(f"Nome Completo: {nome}")
    print(f"Cargo: {cargo}")
    print(f"Nome da Empresa:{empresa}")
    print(f"Salário: {salario}")
    print(f"Tempo de Trabalho:{tempo}")

        
coletar_informacoes()