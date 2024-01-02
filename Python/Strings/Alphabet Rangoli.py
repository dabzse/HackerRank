# language: pypy3

import string


def print_rangoli(size):
    # your code goes here
    alphabet = string.ascii_lowercase

    data = [alphabet[i] for i in range(size)]
    items = list(range(size))
    items = items[:-1] + items[::-1]
    for i in items:
        temp = data[-(i + 1):]
        row = temp[::-1] + temp[1:]
        print("-".join(row).center(n * 4 - 3, "-"))

if __name__ == '__main__':
    n = int(input())
    print_rangoli(n)
