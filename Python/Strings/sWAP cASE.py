# language: pypy3

def swap_case(s):
    text = ""
    for char in s:
        if char.islower():
            text += char.upper()
        else:
            text += char.lower()
    return text

