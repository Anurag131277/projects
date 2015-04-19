import cx_Freeze

executables=[cx_Freeze.Executable("Snakes.py")]

cx_Freeze.setup(name="Snakes 1.0",
                options={"build_exe":{"packages":["pygame"],"include_files":["apple.png","SSnakehead.png"]}},
                description="Slither Game",
                executables=executables
                )
