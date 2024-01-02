# language: pypy3

def print_formatted(number):
    # your code goes here
    width = len("{0:b}".format(number))
    for i in range(1, number+1):
        print("{i:{width}d} {i:{width}o} {i:{width}X} {i:{width}b}".format(i=i, width=width))
