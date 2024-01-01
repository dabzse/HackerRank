# language: pypy3

if __name__ == '__main__':
    grade_list = []
    for _ in range(int(input())):
        name = input()
        score = float(input())
        grade_list.append([name, score])

    grade_list = sorted(grade_list, key = lambda x: x[1])
    sec_lowest = sorted(list(set([x[1] for x in grade_list])))[1]

    students = []
    for student in grade_list:
        if student[1] == sec_lowest:
            students.append(student[0])
    print("\n".join(sorted(students)))
