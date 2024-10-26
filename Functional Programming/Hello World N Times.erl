-module(solution).
-export([main/0]).


main() ->
    {N, _} = string:to_integer(string:chomp(io:get_line(""))),
    hello_world(N).

hello_world(0) -> ok;
hello_world(N) ->
    io:format("Hello World~n", []),
    hello_world(N-1).
