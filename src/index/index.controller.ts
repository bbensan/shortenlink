import { Controller, Get } from "@nestjs/common";
import { IndexService } from "./index.service";

@Controller('')
export class IndexController {
  constructor(private readonly indexService: IndexService) {}

  @Get()
  index() {
    return this.indexService.index();
  }

  @Get('health')
  healthCheck() {
    return this.indexService.healthCheck();
  }
}