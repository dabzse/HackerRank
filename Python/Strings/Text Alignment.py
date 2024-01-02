# language: pypy3

# Enter your code here. Read input from STDIN. Print output to STDOUT

tn = int(input())
ch = "H"

for i in range(tn):
    print((ch * i).rjust(tn - 1) + ch + (ch * i).ljust(tn - 1))

for i in range(tn + 1):
    print((ch * tn).center(tn * 2) + (ch * tn).center(tn * 6))

for i in range((tn + 1) // 2):
    print((ch * tn * 5).center(tn * 6))

for i in range(tn + 1):
    print((ch * tn).center(tn * 2) + (ch * tn).center(tn * 6))

for i in range(tn):
    print(((ch * (tn - i - 1)).rjust(tn) + ch + (ch * (tn - i - 1)).ljust(tn)).rjust(tn * 6))
