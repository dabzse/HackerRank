# language: pypy3

import re

for _ in range(int(input())):
    UID = "".join(sorted(input()))
    try:
        assert re.search(r"[A-Z]{2}", UID)
        assert re.search(r"\d\d\d", UID)
        assert not re.search(r"[^a-zA-Z0-9]", UID)
        assert not re.search(r"(.)\1", UID)
        assert len(UID) == 10
    except:
        print("Invalid")
    else:
        print("Valid")
