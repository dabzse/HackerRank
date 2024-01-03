# language: pypy3

_, en_subs = input(), set(map(int, input().split()))
_, fr_subs = input(), set(map(int, input().split()))
print(len(en_subs.symmetric_difference(fr_subs)))
